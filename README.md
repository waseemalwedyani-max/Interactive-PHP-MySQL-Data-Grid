# 🌐 Interactive PHP & MySQL Data Grid

📝 **Overview**
This project is a complete, mini web application that allows users to input data (Name and Age), save it to a MySQL database, display it dynamically in a table, and toggle the record's status instantly using AJAX without reloading the page.

🔗 **Live Demo:** [http://waseemakwedyani.site.je](http://waseemakwedyani.site.je)

Built with: ⚡ **HTML**, 🐘 **PHP**, 🟨 **JavaScript (AJAX)**, and 🐬 **MySQL**. Hosted on InfinityFree.

---

## 🗄️ Step 1: Database Setup
The database and table were created via `phpMyAdmin` on the InfinityFree hosting dashboard.

* 🗃️ **Database Name:** `if0_42401176_db_waseem`
* 📋 **Table Name:** `user1`
* 🏗️ **Table Structure (Columns):**
  1. 🔑 **`id`**: (INT) Auto Increment (A_I) enabled to act as the Primary Key.
  2. 👤 **`name`**: (VARCHAR/TEXT) To store the user's name.
  3. 🎂 **`age`**: (INT) To store the user's age.
  4. 🚦 **`status`**: (INT) Default value set to `As defined: 0`, so any new user automatically gets a status of 0 upon entry.

---

## 📁 Step 2: Building the Project Files
The project is divided into 4 separate files to ensure clean code and apply the "Separation of Concerns" programming principle.

### 📄 1. Main Interface (`index.php`)
* 🎯 **Function:** The front-end file. It contains the input form, embeds the display table, and holds the AJAX JavaScript for instant toggling.
* 🛠️ **Source & Modifications:**
  * **Form (HTML):** Written from scratch. Set `action="insert.php"` to route the data and used `method="GET"`.
  * **JavaScript (AJAX):** The core `XMLHttpRequest` logic was sourced from **W3Schools** (AJAX Database tutorial).
  * **Why modified:** We changed the function name to `toggleStatus(id)`, redirected the request to our custom `update.php` file, and targeted the specific table cell using `id="status_id"` instead of updating a random text element.
  * **Inclusion:** Added `<?php include 'select.php'; ?>` at the bottom to seamlessly embed the table into the UI.

### 💾 2. Data Insertion (`insert.php`)
* 🎯 **Function:** A backend script that receives form data, inserts it as a new row in the database, and provides a link to navigate back to the homepage.
* 🛠️ **Source & Modifications:**
  * The base database connection and `INSERT INTO` query were initially provided by the user.
  * **Why modified:** The original code had hardcoded values (like 'Doe'). We modified it to accept real, dynamic input using the superglobals `$_GET['name']` and `$_GET['age']`. We also left the `id` field empty `''` in the SQL query to let the database handle the auto-increment numbering.

### 📊 3. Table Display (`select.php`)
* 🎯 **Function:** Connects to the database, fetches all records from the `user1` table, and renders them dynamically inside an HTML table grid.
* 🛠️ **Source & Modifications:**
  * The base `SELECT` query and fetch loop were sourced from **W3Schools**.
  * **Why modified:** The original code printed raw, unformatted text using `echo`. We wrapped the fetched data in HTML table tags (`<tr>` and `<td>`) to create a structured grid layout.
  * **AJAX Additions:** Added `id='status_" . $row["id"] . "'` to the status cell so JavaScript can locate it. We also added a `Toggle` button in the Action column with `onclick='toggleStatus(" . $row["id"] . ")'` to trigger the instant update function.

### 🔄 4. Instant Update (`update.php`)
* 🎯 **Function:** Acts as a background mini-API. It receives the AJAX request, toggles the status value in the database, and returns the newly updated number.
* 🛠️ **Source & Modifications:**
  * The logic was custom-written specifically to meet the task's requirement (toggling status between 0 and 1 without a page refresh).
  * **How it works:** It receives the target row's `id`. It queries the current status; if it is `0`, it changes the variable to `1` (and vice versa). It then executes an `UPDATE` SQL query to save the new state, and finally `echo`es the new number. The AJAX script catches this response and instantly updates the specific table cell on the front end.

---

## 🚀 How It Works (Workflow)
1. ✍️ The user opens `index.php` and types in their name and age.
2. 📤 Upon clicking `Submit`, the data is sent via `GET` to `insert.php`, saved to the database with a default status of `0`, and the user is guided back to the homepage.
3. 📥 The embedded `select.php` file automatically fetches and renders the table, now including the newly added data.
4. 🖱️ Clicking the `Toggle` button next to any name triggers the background `AJAX` function, silently sending that row's ID to `update.php`.
5. 🔀 `update.php` flips the status in the database (0 to 1, or 1 to 0) and returns the new value.
6. ✨ The AJAX script receives the new number and injects it right into the table cell instantly, providing a seamless user experience without any page reloads!
