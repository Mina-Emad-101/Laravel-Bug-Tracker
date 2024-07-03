# Bug-Tracking-WebApp

# This time with Laravel!

### This Bug Tracking Web Application manages Bugs for different Projects.

### I Already made this app using pure PHP but this Time I'm making it using The Laravel PHP Framework.

#### I am still working on it, as I'm using this project as a way to learn Laravel, So I'm taking it step-by-step :)

#### feel free to take a look at the code!

### Update: I have finished making the App!!!

### You can take a look at it at <a href="mina.sytes.net">mina.sytes.net</a>

<br>

## Front-End: HTML and CSS ( With Tailwind CSS )

## Back-End: PHP, Laravel and SQLite

<br>

## App Explanation:

### What the App does, is manage bugs for multiple projects, by having 3 types of users:

<ol>
    <li>Customer</li>
    <li>Administrator</li>
    <li>Staff Member</li>
</ol>

<br>

#### Customer

<ul>
	<li>Register Account ( ✅ )</li>
	<li>Log into the App ( ✅ )</li>
	<li>Send Bug Details raised from their Software to Administrator Including Screenshot ( ✅ )</li>
	<li>Monitor Bug's Case-Flow Details ( ✅ )</li>
	<li>Delete Their Bug ( ✅ )</li>
</ul>

#### Administrator

<ul>
	<li>Log into the App ( ✅ )</li>
	<li>Add Administrators and Staff Members Accounts to App ( ✅ )</li>
	<li>View Bugs sent from Customers ( ✅ )</li>
	<li>Assign Bugs to Staff Members ( ✅ )</li>
	<li>Monitor Bug's Case-Flow Details ( ✅ )</li>
</ul>

#### Staff Member

<ul>
	<li>Log into the App ( ✅ )</li>
	<li>View Bugs Assigned to Them ( ✅ )</li>
	<li>Monitor Bug's Case-Flow Details ( ✅ )</li>
	<li>Send Solution Message to Customer regarding their Bug ( ✅ )</li>
</ul>

<br>
<br>

### Database Tables:

<ul>
	<li>Users</li>
	<li>Roles</li>
	<li>Projects</li>
	<li>Bugs</li>
	<li>Priorities</li>
	<li>Statuses</li>
	<li>Messages</li>
</ul>

<br>

#### Roles

This table contains The Main Roles for Users

<ul>
	<li>ID (Primary Key)</li>
	<li>Name</li>
</ul>

#### Users

This table contains Authentication data for Users

<ul>
	<li>ID (Primary Key)</li>
	<li>Username</li>
	<li>Email</li>
	<li>Password</li>
	<li>Role ID (Foreign Key -> Roles.ID)</li>
</ul>

#### Projects

This table contains Projects' data

<ul>
	<li>ID (Primary Key)</li>
	<li>Name</li>
</ul>

#### Priorities

This table contains Bugs' Priorities

<ul>
	<li>ID (Primary Key)</li>
	<li>Name</li>
</ul>

#### Statuses

This table contains Bugs' Statuses

<ul>
	<li>ID (Primary Key)</li>
	<li>Name</li>
</ul>

#### Bugs

This table contains Bugs' data

<ul>
	<li>ID (Primary Key)</li>
	<li>Project ID (Foreign Key -> Projects.ID)</li>
	<li>Priority ID (Foreign Key -> Priorities.ID)</li>
	<li>Status ID (Foreign Key -> Statuses.ID)</li>
	<li>Description</li>
	<li>Assigned Staff ID (Foreign Key -> Users.ID)</li>
	<li>Reporter ID (Foreign Key -> Users.ID)</li>
	<li>Created At</li>
</ul>

#### Messages

This table contains Messages sent to Customers

<ul>
	<li>ID (Primary Key)</li>
	<li>Message</li>
	<li>Sender ID (Foreign Key -> Users.ID)</li>
	<li>Receiver ID (Foreign Key -> Users.ID)</li>
	<li>Bug ID (Foreign Key -> Bugs.ID)</li>
</ul>
