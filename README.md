# Sales CRM for Freelancers

CRM liviano orientado a freelancers, developers y pequeños equipos que necesitan gestionar:

- prospección de empresas
- contactos
- interacciones comerciales
- follow-ups
- cotizaciones
- negociaciones
- pipeline comercial

## Objetivo

Centralizar el proceso comercial para evitar perder oportunidades por desorganización, falta de seguimiento o falta de contexto histórico sobre cada lead.

## Funcionalidades principales

- Gestión de empresas prospectadas
- Gestión de contactos por empresa
- Registro de canales de contacto
- Timeline de interacciones
- Follow-ups con vencimiento
- Cotizaciones y estados de negociación
- Dashboard con pendientes, vencidos y pipeline

## Stack

- Laravel 12
- PHP 8.2+
- MySQL
- Blade / Livewire
- Tailwind CSS

## Módulos

- Companies
- Contacts
- Contact Channels
- Interactions
- Quotations
- FollowUps
- Dashboard

## Flujo principal

1. Registrar empresa
2. Registrar contactos
3. Registrar primer outreach
4. Programar follow-up
5. Registrar respuestas
6. Enviar cotización
7. Negociar
8. Marcar como ganado o perdido

## Estados de empresa

- prospect
- contacted
- replied
- meeting
- proposal_sent
- negotiation
- won
- lost
- archived

## Estados de cotización

- draft
- sent
- viewed
- negotiating
- accepted
- rejected
- expired

## Estados de follow-up

- pending
- done
- skipped
- cancelled

## Primeros pasos

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
Convenciones
Cada interacción importante debe quedar registrada
Cada propuesta enviada debe tener follow-up asociado
No usar notas sueltas fuera del sistema
El dashboard debe ser el punto de entrada diario
Roadmap
MVP
CRUD empresas
CRUD contactos
interacciones
follow-ups
cotizaciones
dashboard básico
V2
templates de mensajes
alertas por mail
scoring de leads
etiquetas
filtros avanzados
adjuntos
V3
automatización de follow-ups
IA para sugerir mensajes
sincronización con Gmail / calendario
Kanban comercial

---

# 8) Documentación extra para el root

---

## `docs/domain-overview.md`

```md
# Domain Overview

## Entidades principales

### Company
Representa una empresa o lead comercial.

### Contact
Persona dentro de una empresa.

### ContactChannel
Medio específico de contacto: email, LinkedIn, WhatsApp, etc.

### Interaction
Registro histórico de una acción comercial o respuesta.

### Quotation
Propuesta económica enviada a una empresa o contacto.

### FollowUp
Tarea pendiente asociada a una interacción o cotización.

## Objetivo del dominio

Permitir que el usuario gestione de forma ordenada su pipeline comercial y mantenga trazabilidad total sobre:

- a quién contactó
- cuándo lo hizo
- qué dijo
- cuándo debe insistir
- qué cotizó
- en qué estado está la negociación