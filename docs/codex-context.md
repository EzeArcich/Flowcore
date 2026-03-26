# Codex Context

## Project purpose
This project is a lightweight commercial CRM for freelancers and small service teams.

## Business problem
Freelancers often lose opportunities because they do not track:
- who they contacted
- when they contacted them
- when to follow up
- what they quoted
- the current negotiation state

## Core modules
- Companies
- Contacts
- Contact Channels
- Interactions
- Quotations
- FollowUps
- Dashboard

## Main business rules
- Every outbound contact should generate a traceable interaction.
- Important interactions may generate a follow-up.
- Sent quotations should usually generate a follow-up.
- Dashboard is the main operational entry point.

## Technical conventions
- Laravel 12
- MySQL
- Blade or Livewire
- Keep controllers thin whenever possible
- Prefer FormRequests for validation
- Prefer services for reusable business logic
- Prefer explicit enums or constants for statuses