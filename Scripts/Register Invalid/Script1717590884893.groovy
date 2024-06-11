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

WebUI.click(findTestObject('Object Repository/Page_Login HealthSis/a_Tidak mempunyai akun'))

WebUI.setText(findTestObject('Object Repository/Page_SignUp HealthSis/input_Register_FirstName'), 'Herdi')

WebUI.setText(findTestObject('Object Repository/Page_SignUp HealthSis/input_Register_Username'), 'herdiardn')

WebUI.setText(findTestObject('Object Repository/Page_SignUp HealthSis/input_Register_Email'), 'herdiardn@gmail.com')

WebUI.setEncryptedText(findTestObject('Object Repository/Page_SignUp HealthSis/input_Register_password'), 'EpplGP+PMAXYxQCSPvD4Mw==')

WebUI.click(findTestObject('Object Repository/Page_SignUp HealthSis/input_Register_btn btn-primary'))

WebUI.click(findTestObject('Object Repository/Page_SQLSTATE23000 Integrity constraint vio_53b90e/div_SQLSTATE23000 Integrity constraint viol_501b98'))

WebUI.closeBrowser()

