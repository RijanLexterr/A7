# HMCF Prime - Customer & Truck Assignment System

A simple internal web app for HMCF Prime Corporation staff to:
1. Keep a list of customers
2. Add/edit customer details through a form
3. Assign trucks/equipment to a customer's job and print the receipt / acknowledgement letter

**Stack:** PHP (REST API, PDO/MySQL) + AngularJS 1.8 (frontend, hash-routing, no build step) + MySQL.
No Node build tools, no Composer packages required — everything runs as plain files on standard
Hostinger shared hosting.

---

## 1. Folder structure

```
/api/            PHP REST endpoints (customers, trucks, assignments, auth)
/database/       schema.sql — run this once to create tables
/css/            stylesheet (mobile-first, works on phones/tablets/POS terminals)
/js/             AngularJS app, services, controllers
/partials/       AngularJS view templates
/print/          standalone printable receipt page
index.html       the app shell (loads AngularJS from CDN)
```

## 2. Deploy to Hostinger

1. **Create the database**
   - In hPanel go to *Databases → MySQL Databases*, create a database and a user, and note the
     database name, username, password (Hostinger prefixes these with `u123456789_`).
   - Open *phpMyAdmin*, select the new database, go to the **SQL** tab, and run the contents of
     `database/schema.sql`. This creates all tables and one default login.
   - **Already deployed an earlier version of this app?** Just run `database/migration_v2.sql`
     instead — it adds the new `email` / password-reset columns without touching your existing
     customers, trucks, or assignments.

2. **Upload the files**
   - Zip this whole folder and upload it via *File Manager* (or FTP) into `public_html/`
     (or a subfolder/subdomain such as `public_html/app/` → `app.hmcfprime.online`, recommended
     so this stays separate from the public marketing site).
   - Extract it there.

3. **Set your configuration**
   - Edit `api/config.php` and fill in the real `DB_NAME`, `DB_USER`, `DB_PASS`.
   - Also set `SITE_URL` to wherever you deployed the app (e.g. `https://app.hmcfprime.online`)
     and `MAIL_FROM` to a real mailbox on your domain — both are used for the "forgot password"
     emails (see Section 7).

4. **Log in**
   - Visit the app URL, e.g. `https://app.hmcfprime.online/`.
   - Default login: **username `admin`, password `admin123`**.
   - **Change this password immediately** — either through the account's own "Forgot password"
     flow, or via **Staff Accounts** in the sidebar once logged in.

That's it — no `npm install`, no Composer, no build step. AngularJS is loaded from a public CDN,
so the server only needs to serve static files and run PHP.

## 3. Using the app

- **Sidebar navigation** — fixed on the left on desktop; on phones/tablets it collapses into a
  slide-in drawer opened with the ☰ button in the top bar.
- **Dashboard** — the landing page after login. Shows total customers, fleet status breakdown
  (Available/Assigned/Maintenance), assignment counts by status, jobs scheduled today, this
  month's recorded amount, and a table of the most recent assignments with quick Edit/Print
  actions.
- **Customers** — list, search, add, edit, archive. Archiving hides a customer from the active
  list without deleting their history (so old receipts still show correct customer info).
- **Trucks** — simple fleet list (plate number, type, capacity, status). Add your trucks here
  first; they're what populates the dropdown in the assignment form.
- **Assignments** — pick a customer + an available truck, fill in driver/service/location
  details, save. A receipt number is generated automatically (e.g. `HMCF-2026-0001`). After
  saving, click **Print Receipt / Acknowledgement Letter** to open a print-ready page — this
  works with regular printers as well as receipt/thermal printers connected to a terminal,
  since it's just the browser's native print dialog.
- **Staff Accounts** — add, edit, or remove logins for office staff. Everyone here shares the
  same access level. An email address is optional per account but required for that person to
  use "Forgot password" themselves.

## 4. Mobile / terminal use

The interface is mobile-first:
- Layout, buttons, and form fields are sized for touchscreens (44px+ touch targets).
- Tables collapse into stacked cards on narrow screens instead of squeezing columns.
- The nav collapses into a menu button below 720px width.

It has been designed to work well on a phone, tablet, or a small POS-style terminal browser,
as well as full desktop screens.

## 5. Notes / things to customize

- `print/receipt.html` has a placeholder company address/phone/email in the header — update
  those to your real business details.
- The default admin account is meant for a single shared staff login. If you want separate
  logins per staff member, add rows to the `users` table (same permission level for all).
- `amount` on the assignment form is optional — leave it blank if you don't want pricing to
  appear on the printed receipt.

## 6. Security checklist before going live

- [ ] Change the default admin password
- [ ] Make sure the site is served over **HTTPS** (Hostinger provides free SSL — enable it in hPanel)
- [ ] Double-check `api/config.php` is not publicly downloadable (the included `.htaccess` blocks
      direct access to it, but confirm `mod_headers`/`.htaccess` overrides are allowed on your plan)
- [ ] Take a database backup regularly (hPanel → Backups)
- [ ] Delete `api/generate_hash.php` once you're done using it (see Section 7)

## 7. Forgot Password — email delivery

The "Forgot password" link on the login page sends a reset link using PHP's built-in `mail()`
function. A few things to know:

- The account requesting the reset must have an **email address on file** (set it under
  **Staff Accounts**). If it doesn't, the request silently does nothing — the on-screen message
  is intentionally the same either way, so the app never reveals which usernames exist.
- Reset links expire after **1 hour** and can only be used once.
- `mail()` works out of the box on most Hostinger plans, but for reliable delivery (so the email
  doesn't land in spam, or fail silently on stricter plans), consider swapping it for
  **PHPMailer with SMTP credentials** from hPanel → Emails. The email-sending code is isolated
  in `api/auth.php` under the `forgot` action, so this is a small, contained change.
- Update `SITE_URL` in `api/config.php` to match your real deployment URL — it's used to build
  the link inside the email.

## 8. Troubleshooting: "admin / admin123 doesn't work" / changing the password

If login fails, or you just want to set your own password:

1. Visit `https://yourapp-domain/api/generate_hash.php?password=YourNewPassword` in your browser.
2. It will print an `UPDATE users SET password_hash = '...' WHERE username = 'admin';` statement.
3. Copy that statement into phpMyAdmin → your database → **SQL** tab → Go.
4. Log in again with `admin` / `YourNewPassword`.
5. **Delete `api/generate_hash.php` from the server afterward** — it's a one-time tool and
   shouldn't be left publicly reachable.

(If you're seeing this because the very first login didn't work: the default hash shipped in an
earlier version of `schema.sql` was invalid. The current `schema.sql` has a corrected hash for
`admin123`, but if you already imported the old one, use the steps above to fix it in place
instead of re-running the whole schema.)
