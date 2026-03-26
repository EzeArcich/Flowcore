# Database Design

## companies
Tabla principal de leads/empresas.

Campos clave:
- name
- website
- industry
- status
- first_contact_at
- last_contact_at
- next_follow_up_at

## contacts
Personas asociadas a una empresa.

Campos clave:
- company_id
- full_name
- role
- email
- linkedin_url
- is_primary
- is_decision_maker
- status

## contact_channels
Medios de contacto guardados y utilizados.

## interactions
Historial cronológico de comunicaciones.

## quotations
Propuestas económicas enviadas.

## follow_ups
Tareas de seguimiento con vencimiento.

## Reglas de negocio

- Una empresa puede tener muchos contactos.
- Una empresa puede tener muchas interacciones.
- Una cotización pertenece a una empresa y opcionalmente a un contacto.
- Un follow-up puede nacer desde una interacción o una cotización.