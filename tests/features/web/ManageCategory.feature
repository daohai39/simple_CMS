Feature: Manage Category
	In order to manage all categories
	As an admin
	I need to be able to create, read, update, delete every category


Scenario: Read a single category
    Given category name "Indoor" id "1" exists
    When I go to "/admin/category/1"
    Then I should see "Indoor"

Scenario: Create a root category
    Given I am on "/admin/category/create"
    When I fill in "name" with "Indoor"
    And I press "Tạo"
    Then I should be on "/admin/category/1"
    And I should see "Indoor"

#@javascript
#Scenario: Create a child category
#    Given category name "Indoor" id "1" exists
#    When I go to "/admin/category/create"
#    Then I fill in "name" with "Bedroom"
#    And I click ".select2-selection__placeholder" element
#    And I type in ".select2-search__field" element with "Bedroom"
#    And I press "Tạo"
#    And I should see "Bedroom"



