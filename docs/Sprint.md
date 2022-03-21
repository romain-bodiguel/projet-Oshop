# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/mentiones-legales` | `GET` | `MainController` | `legalNotice` | Legal Notice | - | - |
| `/catalogue/categorie/[i:id]` | `GET` | `CatalogController` | `category` | Category | 5 categories | Category number |
| `/catalogue/type/[i:id]` | `GET` | `CatalogController` | `type` | Type | N types | Type number |
| `/catalogue/marque/[i:id]` | `GET` | `CatalogController` | `brand` | Brands | N brands | Brand number |
| `/catalogue/produit/[i:id]` | `GET` | `CatalogController` | `product` | Product | 1 product | Chosen product |