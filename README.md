<<<<<<< HEAD
# Simple-PHP-Framework (Educational Purpose)

### Why did I build this project?
The primary goal of creating this mini-framework was to deconstruct and understand the internal architecture of Laravel before diving into it. By "reinventing the wheel," I gained a deep understanding of:
* **MVC Pattern & Core PHP:** How a request flows from index.php to the controller.
* **SOLID Principles:** Applying real-world design patterns to keep code maintainable.
* **Framework Philosophy:** Understanding exactly what a framework does for us and why we need one.
* **Core Development:** This project empowers me to extend or contribute to Laravel's core in the future, as I now understand the underlying mechanisms.

---

### (Key Features)
- **Custom Collection Engine:**   Immutability و Method Chaining.
- **Custom Router & Request/Response:**  (Lifecycle).
- **Architecture:** (Repository/Service).
- **Security:**  SQL Injection و XSS.

> **Note:** This project is an architectural exercise and is not intended for production use. It served as a solid foundation for my mastery of the Laravel framework.

---
<pre>
## File Structure
├── /app
│   ├── /Controllers
│   ├── /Models
│   ├── /Repositories
│   └── /Services
├── /config (Configuration files)
├── /core (Framework core engine)
│   ├── Router.php
│   ├── Request.php
│   ├── Response.php
│   ├── Collection.php
│   └── Database.php
├── /public (Entry point)
│   └── index.php
├── .env (Environment variables)
└── routes.php (Route definitions)
</pre>
