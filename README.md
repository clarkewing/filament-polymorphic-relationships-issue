# Filament Polymorphic Relationships Issue

Minimal reproduction of an issue with Filament form components handling nested relationships through polymorphic connections.

## Issue Description

Attempting to use a Repeater component to manage tracks through a polymorphic relationship results in:
BadMethodCallException
Call to undefined method App\Models\Chapter::tracks()
Copy
The form tries to access `tracks()` directly on the Chapter model instead of following the relationship chain `Chapter->content->tracks`.

## Setup

1. Clone repository
2. `cp .env.example .env`
3. `php artisan key:generate`
4. `php artisan serve`

## Steps to Reproduce

1. Go to [Chapters resource](http://127.0.0.1:8000/admin/chapters)
2. Create new Chapter
3. Observe error when form attempts to load tracks repeater

## Expected Behavior

Form should access tracks through the content relationship chain.