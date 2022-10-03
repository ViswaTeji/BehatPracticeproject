#language: en
@autopractlogin
Feature:Verify scroll functionality

  Background:
    Given I am on homepage
    And click on x button

  @scroll
  Scenario:
    When I fill in email address with "v.viswateji@gmail.com"
    Then wait for 5 seconds
    And I click on subscribe button

