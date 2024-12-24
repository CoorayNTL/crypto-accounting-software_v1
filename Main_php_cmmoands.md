Here’s a list of **commonly used Artisan commands in Laravel** for different purposes:

---

### **1. General Laravel Commands**
1. **Check Laravel Version**:
   ```bash
   php artisan --version
   ```

2. **Serve the Application Locally**:
   ```bash
   php artisan serve
   ```

3. **Clear All Caches**:
   ```bash
   php artisan cache:clear
   ```

4. **Clear Config Cache**:
   ```bash
   php artisan config:clear
   ```

5. **Rebuild Config Cache**:
   ```bash
   php artisan config:cache
   ```

6. **Clear Route Cache**:
   ```bash
   php artisan route:clear
   ```

7. **Rebuild Route Cache**:
   ```bash
   php artisan route:cache
   ```

8. **Clear View Cache**:
   ```bash
   php artisan view:clear
   ```

9. **Run a Custom Command**:
   ```bash
   php artisan command:name
   ```
   Replace `command:name` with your custom command's name.

---

### **2. Route Commands**
1. **View All Registered Routes**:
   ```bash
   php artisan route:list
   ```
   Add `--name=filter` to filter routes by name:
   ```bash
   php artisan route:list --name=api
   ```

---

### **3. Controller Commands**
1. **Create a New Controller**:
   ```bash
   php artisan make:controller ControllerName
   ```
   Example:
   ```bash
   php artisan make:controller UserController
   ```

2. **Create a Controller with Resource Methods**:
   ```bash
   php artisan make:controller ControllerName --resource
   ```

3. **Create an API Controller**:
   ```bash
   php artisan make:controller ControllerName --api
   ```

---

### **4. Model Commands**
1. **Create a New Model**:
   ```bash
   php artisan make:model ModelName
   ```
   Example:
   ```bash
   php artisan make:model User
   ```

2. **Create a Model with a Migration**:
   ```bash
   php artisan make:model ModelName -m
   ```

3. **Create a Model with Factory and Seeder**:
   ```bash
   php artisan make:model ModelName -msf
   ```

---

### **5. Middleware Commands**
1. **Create Middleware**:
   ```bash
   php artisan make:middleware MiddlewareName
   ```
   Example:
   ```bash
   php artisan make:middleware CheckUserRole
   ```

---

### **6. Authentication and Security Commands**
1. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

2. **Install Laravel Breeze (Simple Auth Scaffolding)**:
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install
   npm install && npm run dev
   php artisan migrate
   ```

3. **Install Laravel Sanctum for API Authentication**:
   ```bash
   composer require laravel/sanctum
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   php artisan migrate
   ```

---

### **7. Queue Commands**
1. **Start a Queue Worker**:
   ```bash
   php artisan queue:work
   ```

2. **Retry Failed Jobs**:
   ```bash
   php artisan queue:retry all
   ```

3. **Flush All Failed Jobs**:
   ```bash
   php artisan queue:flush
   ```

4. **Create a New Job**:
   ```bash
   php artisan make:job JobName
   ```

---

### **8. Event and Listener Commands**
1. **Create an Event**:
   ```bash
   php artisan make:event EventName
   ```

2. **Create a Listener**:
   ```bash
   php artisan make:listener ListenerName
   ```

3. **List All Events and Listeners**:
   ```bash
   php artisan event:list
   ```

---

### **9. Testing Commands**
1. **Run Tests**:
   ```bash
   php artisan test
   ```

2. **Create a Test**:
   ```bash
   php artisan make:test TestName
   ```

3. **Create a Feature Test**:
   ```bash
   php artisan make:test TestName --unit
   ```

---

### **10. Package Management Commands**
1. **Publish Vendor Files**:
   ```bash
   php artisan vendor:publish
   ```

2. **Publish Files for a Specific Provider**:
   ```bash
   php artisan vendor:publish --provider="Provider\Namespace"
   ```

3. **Publish a Specific Tag**:
   ```bash
   php artisan vendor:publish --tag=tagname
   ```

---

### **11. Storage Commands**
1. **Link Storage Directory**:
   ```bash
   php artisan storage:link
   ```

---

### **12. Scheduler Commands**
1. **Run Scheduled Commands**:
   ```bash
   php artisan schedule:run
   ```

2. **List Scheduled Commands**:
   ```bash
   php artisan schedule:list
   ```

---
