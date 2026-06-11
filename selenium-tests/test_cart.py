from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time


class TestCart:

    def setup_method(self):
        self.driver = webdriver.Chrome(
            service=Service(
                ChromeDriverManager().install()
            )
        )

        self.driver.maximize_window()

    def teardown_method(self):
        self.driver.quit()

    def login_user(self):

        self.driver.get(
            "http://127.0.0.1:8000/login"
        )

        self.driver.find_element(
            By.ID,
            "email"
        ).send_keys("masrusdi@gmail.com")

        self.driver.find_element(
            By.ID,
            "password"
        ).send_keys("kewerkewer")

        self.driver.find_element(
            By.XPATH,
            "//button[contains(text(),'Masuk Sekarang')]"
        ).click()

    def test_ec1_qty_valid(self):

        self.login_user()

        self.driver.get(
            "http://127.0.0.1:8000/products/kemasan-makanan-premium"
        )

        self.driver.find_element(
         By.CSS_SELECTOR,
            "button[type='submit']"
        ).click()

        time.sleep(2)

        assert "cart" in self.driver.page_source.lower()