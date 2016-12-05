<?php

namespace SS6\ShopBundle\Tests\Acceptance\acceptance\PageObject\Admin;

use SS6\ShopBundle\Tests\Acceptance\acceptance\PageObject\AbstractPage;

class LoginPage extends AbstractPage {

	const ADMIN_USERNAME = 'admin';
	const ADMIN_PASSWORD = 'admin123';

	/**
	 * @param string $username
	 * @param string $password
	 */
	public function login($username, $password) {
		$this->tester->amOnPage('/admin/');
		$this->tester->fillFieldByName('admin_login_form[username]', $username);
		$this->tester->fillFieldByName('admin_login_form[password]', $password);
		$this->tester->clickByText('Přihlásit');
	}

	public function assertLoginFailed() {
		$this->tester->see('Přihlášení se nepodařilo.');
		$this->tester->seeCurrentPageEquals('/admin/');
	}

}