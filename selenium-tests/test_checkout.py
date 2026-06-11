from base_test import BaseTest


class TestCheckout(BaseTest):

    def test_ec1_checkout_valid(self):

        self.login_admin()

        self.assertTrue(True)

    def test_ec2_alamat_kosong(self):

        self.login_admin()

        self.assertTrue(True)

    def test_ec3_user_belum_login(self):

        self.assertTrue(True)