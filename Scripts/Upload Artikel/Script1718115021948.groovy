import static com.kms.katalon.core.checkpoint.CheckpointFactory.findCheckpoint
import static com.kms.katalon.core.testcase.TestCaseFactory.findTestCase
import static com.kms.katalon.core.testdata.TestDataFactory.findTestData
import static com.kms.katalon.core.testobject.ObjectRepository.findTestObject
import static com.kms.katalon.core.testobject.ObjectRepository.findWindowsObject
import com.kms.katalon.core.checkpoint.Checkpoint as Checkpoint
import com.kms.katalon.core.cucumber.keyword.CucumberBuiltinKeywords as CucumberKW
import com.kms.katalon.core.mobile.keyword.MobileBuiltInKeywords as Mobile
import com.kms.katalon.core.model.FailureHandling as FailureHandling
import com.kms.katalon.core.testcase.TestCase as TestCase
import com.kms.katalon.core.testdata.TestData as TestData
import com.kms.katalon.core.testng.keyword.TestNGBuiltinKeywords as TestNGKW
import com.kms.katalon.core.testobject.TestObject as TestObject
import com.kms.katalon.core.webservice.keyword.WSBuiltInKeywords as WS
import com.kms.katalon.core.webui.keyword.WebUiBuiltInKeywords as WebUI
import com.kms.katalon.core.windows.keyword.WindowsBuiltinKeywords as Windows
import internal.GlobalVariable as GlobalVariable
import org.openqa.selenium.Keys as Keys

WebUI.openBrowser('')

WebUI.navigateToUrl('http://127.0.0.1:8000/Login')

WebUI.setText(findTestObject('Object Repository/Page_Login HealthSis/input_Login_email'), 'herdiardana@gmail.com')

WebUI.setEncryptedText(findTestObject('Object Repository/Page_Login HealthSis/input_Login_password'), 'EpplGP+PMAXYxQCSPvD4Mw==')

WebUI.click(findTestObject('Page_Login HealthSis/input_Login_signInbtn'))

WebUI.click(findTestObject('Object Repository/Page_Dashboard/a_Artikel'))

WebUI.click(findTestObject('Object Repository/Page_Artikel/input_SignOut_CreateArtikel'))

WebUI.setText(findTestObject('Object Repository/Page_Create-Artikel/input_Judul_Judul'), 'Event')

WebUI.click(findTestObject('Object Repository/Page_Create-Artikel/img'))

WebUI.setText(findTestObject('Object Repository/Page_Create-Artikel/textarea_Isi Artikel_Deskripsi'), 'Ikut event jalan sehat besok yuk di bandung!')

WebUI.click(findTestObject('Object Repository/Page_Create-Artikel/button_Submit'))

WebUI.click(findTestObject('Object Repository/Page_Artikel/html_Artikel            katalonfont-familym_f5cc1f'))

