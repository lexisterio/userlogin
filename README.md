## User_Research_Login
- By: Lexi Sterio

## Prerequisites
- Atom
- Terminal
- PHPmyAdmin

## Info
- In this project I am creating a web app that is using an instant messaging system with node.js, socket.io and express. This will be a chat system to load instantly without refreshing the page, and will provide a good template chat system for future builds!

## Websites used for reference
- http://php.net/manual/en/reserved.variables.session.php
- http://php.net/manual/en/function.date.php
- http://php.net/manual/en/language.operators.comparison.php

## Step 1
- Research and Create login page (done in class)

## Step 2
- Display date/time of last successful login --> created another SESSION variable in order to save the date and time of the user login
- We used this variable to show the user the date and the time they last logged in. // date("l jS \of F Y h:i:s A") //

# Step 3
- Account gets locked out after 3 failed attempts. In order to do this, you have to create another SESSION variable to save the failed attempts
- You need to create another column in the tbl_user in order to save the status of the user //

## STEP 4
- For the user to receive a welcome message based on the hour of the day, we need to get the hour of the day with the function date using the parameter ("G")
- There are 3 messages the user will receive based on the hour of the day. For 10am and earlier it will be goodmorning, for 17(5:00)and later will be good afternoon and > 20(8:00) will be goodnight

## Authors
- Lexi Sterio
