# language: en
  @English
Feature: Test Login
  Scenario: My First login
    Given I am on homepage
    When I follow "English"
    Then I should see "Log in"
    And this is test