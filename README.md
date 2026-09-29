# QueueFlow

Scalable multi-business appointment booking system built with pure PHP, PostgreSQL, and RabbitMQ for background email notifications.

## Features

- Multi-business support (owners can manage their own business)
- Services per business
- Customer management
- Appointment booking from a public home page
- Dashboard for appointments, services, customers, and stats
- Appointment status flow: `pending` → `confirmed` / `cancelled` / `completed`
- Email notifications via PHPMailer
- Asynchronous email sending with RabbitMQ worker
- Role-based access for dashboard areas

## Tech Stack

- PHP 8+
- PostgreSQL
- RabbitMQ
- PHPMailer
- php-amqplib
- Bootstrap 5 (UI)
- Custom lightweight MVC structure (no full framework)

## Requirements

- PHP 8.1+ with extensions: `pdo_pgsql`, `mbstring`, `openssl`
- Composer
- PostgreSQL
- RabbitMQ (Docker recommended)
- Node not required

## Project Structure

```text
queueflow/
├── app/                 # Core app (Router, Request, View, Auth, ...)
├── config/              # Environment helper
├── controllers/         # HTTP controllers
├── models/              # Database models
├── services/            # MailService, QueueService, AuthService
├── middleware/          # Auth middleware
├── database/            # Migrations / SQL schema
├── views/               # PHP views and layouts
├── workers/             # Background workers (email consumer)
├── public/              # Front controller (index.php)
└── .env                 # Local configuration (not committed)
Installation

1.Clone the repository:

git clone https://github.com/PouyaniArmin/queueflow.git

cd queueflow

2.Install dependencies:

composer install

3.Create your environment file:

cp .env.example .env

4.Configure .env (database, mail, RabbitMQ).
Example .env keys
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=queueflow_db
DB_USERNAME=your_user
DB_PASSWORD=your_password

MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_mailtrap_user
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS=noreply@queueflow.test
MAIL_FROM_NAME=QueueFlow

RABBITMQ_HOST=127.0.0.1
RABBITMQ_PORT=5672
RABBITMQ_USER=guest
RABBITMQ_PASSWORD=guest
RABBITMQ_QUEUE=emails

5.Start the application. Tables are created through the project migration setup when the app boots (Database::ensureDefaultTables()), based on SQL files under database/migrations/.

Running the App
Web server
From the project root:

php -S localhost:8000 -t public

Open: http://localhost:8000

PostgreSQL (Docker example)

docker run -d \
  --name postgres_db \
  -e POSTGRES_USER=armin \
  -e POSTGRES_PASSWORD=1234 \
  -e POSTGRES_DB=queueflow_db \
  -p 5433:5432 \
  postgres:17

Adjust .env to match host, port, user, and password.

RabbitMQ (Docker)

docker run -d \
  --name rabbitmq \
  -p 5672:5672 \
  -p 15672:15672 \
  rabbitmq:management

  AMQP: localhost:5672
Management UI: http://localhost:15672 (guest / guest)

Email worker
Booking and cancel emails are published to RabbitMQ. Start the worker in a separate terminal:

php workers/email_worker.php
Keep this process running while testing email delivery (for example with Mailtrap).
Main Flows
Public booking

User opens the home page
Selects business, service, date, and time
Submits customer details
System creates customer and appointment
A booking email job is pushed to RabbitMQ
Worker sends the email via PHPMailer

Dashboard (authenticated)

View today’s appointments and stats
Manage services
View customers
Confirm, complete, or cancel appointments
Cancel can enqueue a cancellation email

Default Appointment Statuses
Status , Meaning
pending , Newly booked
confirmed , Accepted by business
completed , Service finished
cancelled , Cancelled
Development Notes

This is a learning / MVP-oriented pure PHP project
Multi-tenant style filtering is done via business ownership (forUser helpers)
Email is async through RabbitMQ; without the worker, messages stay in the queue
Time-slot locking and conflict prevention on the booking UI is planned for a later version

Roadmap (v2 ideas)

Disable already booked time slots in the booking form
Stronger server-side conflict checks
Confirm email (in addition to booking and cancel)
Better production process management for the worker (Docker Compose / Supervisor)
Edit and delete flows for services and customers

License
MIT