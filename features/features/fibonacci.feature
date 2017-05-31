Feature: Fibonacci numbers

  Scenario: Correct working scenario
    Given new provider instance
    And calculate for number 2
    Then result is 1
    And calculate for number 16
    Then result is 987
    And calculate for number 1
    Then result is 1

  Scenario: Invalid cases testing
    Given new provider instance
    And calculate for negative number "-1"
    Then error must be thrown
