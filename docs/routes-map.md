# Routes Map

## Dashboard
- GET /dashboard

## Companies
- GET /companies
- GET /companies/create
- POST /companies
- GET /companies/{company}
- GET /companies/{company}/edit
- PUT /companies/{company}
- DELETE /companies/{company}

## Contacts
- GET /companies/{company}/contacts/create
- POST /companies/{company}/contacts
- GET /contacts/{contact}/edit
- PUT /contacts/{contact}
- DELETE /contacts/{contact}

## Interactions
- GET /companies/{company}/timeline
- GET /companies/{company}/interactions/create
- POST /companies/{company}/interactions
- GET /interactions/{interaction}/edit
- PUT /interactions/{interaction}
- DELETE /interactions/{interaction}

## Quotations
- GET /companies/{company}/quotations/create
- POST /companies/{company}/quotations
- GET /quotations/{quotation}/edit
- PUT /quotations/{quotation}
- DELETE /quotations/{quotation}

## FollowUps
- GET /follow-ups
- GET /follow-ups/create
- POST /follow-ups
- GET /follow-ups/{followUp}/edit
- PUT /follow-ups/{followUp}
- DELETE /follow-ups/{followUp}
- PATCH /follow-ups/{followUp}/complete
- PATCH /follow-ups/{followUp}/skip