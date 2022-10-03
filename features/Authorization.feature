#language: en
@login
Feature: Login Functionality

  Background:
    Given I am on homepage
    When I follow "Log in"

  @temp
  Scenario Outline: Verify Login Functionality
    And I fill in "Username" with "<username>"
    And I fill in "Password" with "<password>"
    And I press "Log in"
    Then I should see "<text>" title

    Examples:
      | username            | password     | text         |
      | viswateji           | Test@2707    | viswateji      |
      | viswaauthor         | Test@123     | Login failed    |
      | wrongusername       | test         | Unrecognized username or password |