<?php

namespace Tests\Feature;

use App\Models\HealthSis;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordChangeTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $oldPassword = 'password123';

    protected function setUp(): void
    {
        parent::setUp();

        // Create test user
        $this->user = HealthSis::create([
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'Username' => 'johndoe',
            'Email' => 'john@example.com',
            'password' => Hash::make($this->oldPassword),
            'NoHP' => '1234567890',
            'Status' => 'Active',
            'Note' => 'Test user',
            'Umur' => '25 tahun',
            'TanggalLahir' => '1998-01-01',
            'Image' => 'default.jpg'
        ]);
    }

    /** @test */
    public function password_can_be_changed_with_correct_credentials()
    {
        $response = $this->postJson("/change-password/{$this->user->id}", [
            'current_password' => $this->oldPassword,
            'new_password' => 'newpassword123',
            'confirm_password' => 'newpassword123'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Password berhasil diubah'
            ]);

        $this->user->refresh();
        $this->assertTrue(Hash::check('newpassword123', $this->user->password));
    }

    /** @test */
    public function cannot_change_password_with_incorrect_current_password()
    {
        $response = $this->postJson("/change-password/{$this->user->id}", [
            'current_password' => 'wrongpassword',
            'new_password' => 'newpassword123',
            'confirm_password' => 'newpassword123'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => false,
                'message' => 'Password lama tidak sesuai'
            ]);

        $this->user->refresh();
        $this->assertTrue(Hash::check($this->oldPassword, $this->user->password));
    }

    /** @test */
    public function cannot_change_password_when_confirmation_doesnt_match()
    {
        $response = $this->postJson("/change-password/{$this->user->id}", [
            'current_password' => $this->oldPassword,
            'new_password' => 'newpassword123',
            'confirm_password' => 'differentpassword123'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => false,
                'message' => 'Konfirmasi password baru tidak sesuai'
            ]);

        $this->user->refresh();
        $this->assertTrue(Hash::check($this->oldPassword, $this->user->password));
    }

    /** @test */
    public function cannot_change_password_for_nonexistent_user()
    {
        $nonexistentId = $this->user->id + 1;

        $response = $this->postJson("/change-password/{$nonexistentId}", [
            'current_password' => $this->oldPassword,
            'new_password' => 'newpassword123',
            'confirm_password' => 'newpassword123'
        ]);

        $response->assertStatus(404);
    }

    /** @test */
    public function required_fields_must_be_provided()
    {
        $response = $this->postJson("/change-password/{$this->user->id}", []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'current_password',
                'new_password',
                'confirm_password'
            ]);
    }

    /** @test */
    public function old_and_new_passwords_must_be_different()
    {
        $response = $this->postJson("/change-password/{$this->user->id}", [
            'current_password' => $this->oldPassword,
            'new_password' => $this->oldPassword,
            'confirm_password' => $this->oldPassword
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => false,
                'message' => 'Password baru harus berbeda dengan password lama'
            ]);

        $this->user->refresh();
        $this->assertTrue(Hash::check($this->oldPassword, $this->user->password));
    }
}
