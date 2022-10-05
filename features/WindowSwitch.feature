@frame
Feature: Window switch feature
Scenario: Work with multiple frames
  Given I am on homepage
  When I click on facebook icon
  And wait for 3 seconds
  Then I switch to windows
  And wait for 3 seconds