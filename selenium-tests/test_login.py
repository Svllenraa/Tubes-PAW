from selenium import webdriver
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service


class TestLogin:

    def setup_method(self):
        self.driver = webdriver.Chrome(
            service=Service(
                ChromeDriverManager().install()
            )
        )

        self.driver.maximize_window()

    def teardown_method(self):
        self.driver.quit()

    def test_ec1_login_valid(self):

        self.driver.get(
            "http://127.0.0.1:8000/login"
        )

        self.driver.find_element(
            By.ID,
            "email"
        ).send_keys("admin@example.com")

        self.driver.find_element(
            By.ID,
            "password"
        ).send_keys("12345678")

        self.driver.find_element(
            By.XPATH,
            "//button[contains(text(),'Masuk Sekarang')]"
        ).click()

        assert "/login" not in self.driver.current_url

    def test_ec2_email_tidak_terdaftar(self):

        self.driver.get(
            "http://127.0.0.1:8000/login"
        )

        self.driver.find_element(
            By.ID,
            "email"
        ).send_keys("salah@example.com")

        self.driver.find_element(
            By.ID,
            "password"
        ).send_keys("12345678")

        self.driver.find_element(
            By.XPATH,
            "//button[contains(text(),'Masuk Sekarang')]"
        ).click()

        assert "/login" in self.driver.current_url

    def test_ec3_password_salah(self):

        self.driver.get(
            "http://127.0.0.1:8000/login"
        )

        self.driver.find_element(
            By.ID,
            "email"
        ).send_keys("admin@example.com")

        self.driver.find_element(
            By.ID,
            "password"
        ).send_keys("salah12345")

        self.driver.find_element(
            By.XPATH,
            "//button[contains(text(),'Masuk Sekarang')]"
        ).click()

        assert "/login" in self.driver.current_url

    def test_ec4_format_email_salah(self):

        self.driver.get(
            "http://127.0.0.1:8000/login"
        )

        self.driver.find_element(
            By.ID,
            "email"
        ).send_keys("admin@example.com")

        self.driver.find_element(
            By.ID,
            "password"
        ).send_keys("salah12345")

        self.driver.find_element(
            By.XPATH,
            "//button[contains(text(),'Masuk Sekarang')]"
        ).click()

        assert "/login" in self.driver.current_url


    def test_ec5_field_kosong(self):

        self.driver.get("http://127.0.0.1:8000/login")

        self.driver.find_element(
        By.XPATH,
        "//button[contains(text(),'Masuk Sekarang')]"
    ).click()

        assert "/login" in self.driver.current_url