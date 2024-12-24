
Here are the common PHP Artisan commands related to database management in Laravel:

---

### **Migration Commands**
1. **Run All Pending Migrations**:
   ```bash
   php artisan migrate
   ```
   This applies all migrations in the `database/migrations` directory.

2. **Rollback the Last Migration Batch**:
   ```bash
   php artisan migrate:rollback
   ```
   This undoes the last batch of migrations.

3. **Rollback All Migrations**:
   ```bash
   php artisan migrate:reset
   ```
   This undoes all migrations, rolling back to the initial state.

4. **Drop All Tables and Re-Migrate**:
   ```bash
   php artisan migrate:fresh
   ```
   This drops all database tables and re-runs all migrations.

5. **Rollback and Re-Migrate**:
   ```bash
   php artisan migrate:refresh
   ```
   This rolls back all migrations and runs them again.

6. **Create a New Migration**:
   ```bash
   php artisan make:migration migration_name
   ```
   Replace `migration_name` with the name of your migration. For example:
   ```bash
   php artisan make:migration create_users_table
   ```

7. **Run Migrations for a Specific Path**:
   ```bash
   php artisan migrate --path=/database/migrations/specific_folder
   ```

8. **Specify a Database Connection for Migration**:
   ```bash
   php artisan migrate --database=connection_name
   ```

---

### **Seeding Commands**
1. **Run All Seeders**:
   ```bash
   php artisan db:seed
   ```
   Seeds the database using seeders in the `database/seeders` directory.

2. **Run a Specific Seeder**:
   ```bash
   php artisan db:seed --class=SeederClassName
   ```
   Replace `SeederClassName` with the specific seeder class, e.g.:
   ```bash
   php artisan db:seed --class=UsersTableSeeder
   ```

3. **Migrate and Seed Together**:
   ```bash
   php artisan migrate --seed
   ```
   Runs all migrations and seeds the database in a single command.

---

### **Database Factory Commands**
1. **Generate Dummy Data Using Factories**:
   ```bash
   php artisan tinker
   ```
   Inside Tinker, you can use factories like this:
   ```php
   \App\Models\User::factory()->count(10)->create();
   ```

---

### **Database Cache Commands**
1. **Create Cache Table for Database Cache Driver**:
   ```bash
   php artisan cache:table
   ```
   Generates the migration for the `cache` table.

2. **Run Migrations for the Cache Table**:
   ```bash
   php artisan migrate
   ```

---

### **Database Backup and Maintenance**
1. **Truncate Tables**:
   Laravel doesn’t provide an Artisan command for truncating, but you can use Tinker:
   ```bash
   php artisan tinker
   ```
   Then, truncate a table like this:
   ```php
   \DB::table('table_name')->truncate();
   ```

2. **Drop All Tables**:
   ```bash
   php artisan db:wipe
   ```
   This drops all tables in the current database.

---

### **Verify Database Migrations**
1. **Check Migration Status**:
   ```bash
   php artisan migrate:status
   ```
   This shows which migrations have been run and which are pending.

2. **List All Registered Database Connections**:
   ```bash
   php artisan config:show database.connections
   ```

---

These commands should cover most database-related tasks in Laravel. Let me know if you need further details on any command!
