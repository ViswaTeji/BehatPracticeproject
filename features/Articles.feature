# language: en
@Articles
Feature: Click on articles in home page
  Scenario: Click on Articles
    Given I am on homepage
    When I follow "English"
    Then I should see "Articles"
    And click on "Articles"
    And wait for 2 seconds
