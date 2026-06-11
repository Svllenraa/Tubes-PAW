import unittest

from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager

from selenium.webdriver.support.ui import WebDriverWait

from selenium.webdriver.common.by import By

from config import ADMIN_EMAIL
from config import ADMIN_PASSWORD

from config import BASE_URL


class BaseTest(unittest.TestCase):

    def login_admin(self):

     self.driver.get(f"{BASE_URL}/login")

     self.driver.find_element(
        By.NAME,
        "email"
    ).send_keys(ADMIN_EMAIL)

     self.driver.find_element(
        By.NAME,
        "password"
    ).send_keys(ADMIN_PASSWORD)

     self.driver.find_element(
    By.TAG_NAME,
    "button"
).click()
    





    def setUp(self):

        options = webdriver.ChromeOptions()

        options.add_argument("--start-maximized")

        self.driver = webdriver.Chrome(
            service=Service(ChromeDriverManager().install()),
            options=options
        )

        self.driver.implicitly_wait(5)

        self.wait = WebDriverWait(self.driver, 10)

    def tearDown(self):
        self.driver.quit()


        