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
        By.CSS_SELECTOR,
        "button[type='submit']"
    ).click()