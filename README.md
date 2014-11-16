# SignUp-Login-Logout
===================

PHP code for Sing-up, Log-in and Log-out

### What is it working in this code?

* Sing-up
  1. using `isset()` to check if this access is proper
  2. generate random number for encryption
  3. escape data using `mysqli_real_escape_string()`
  4. encrypt password using `hash()`
  5. prepare sql and run to check if user name is already taken
  6. prepare sql and run to insert _username_, _password_ and random number you made in procedure 2
  
* Log-in
  1. using `isset()` to check if this access is proper
  2. escape data using `mysqli_real_escape_string()`
  3. prepare sql and run
  4. if no result, login page will be shown again
  5. if there is result, password will be compared to encrypted password

* Log-out
  1. using `isset()` to check if there is a session value for log out
  2. clear session `insert empty array, or unset()` and destroy session `session_destroy()`
  