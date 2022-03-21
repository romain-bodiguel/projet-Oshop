# Listing des requêtes

## Layout

<details><summary>5 types dans le footer par footer_order</summary>

```sql
SELECT * 
FROM `type` 
WHERE `footer_order` > 0 
ORDER BY `footer_order`
LIMIT 5
```

</details>

<details><summary>5 marques dans le footer par footer_order</summary>

```sql
SELECT * 
FROM `brand` 
WHERE `footer_order` > 0 
ORDER BY `footer_order` 
LIMIT 5
```

</details>

## Home

<details><summary>5 catégories triées par home_order</summary>

```sql
SELECT *
FROM `category`
WHERE `picture` IS NOT NULL 
AND `home_order` > 0
ORDER BY `home_order`  
LIMIT 5
```

</details>

## Catégorie

<details><summary>Tous les produits de la catégorie #1 triés par nom</summary>

```sql
SELECT *
FROM `product`
WHERE `category_id` = 1
ORDER BY `name`
```

</details>


<details><summary>Tous les produits de la catégorie #1 triés par note</summary>

```sql
SELECT * 
FROM `product` 
WHERE `category_id` = 1 
ORDER BY `rate`
```

</details>


<details><summary>Tous les produits de la catégorie #1 triés par prix</summary>

```sql
SELECT * 
FROM `product` 
WHERE `category_id` = 1 
ORDER BY `price`
```

</details>

## Marque

<details><summary>Tous les produits de la marque #2 triés par nom</summary>

```sql
SELECT * 
FROM `product` 
WHERE `brand_id` = 2
ORDER BY `name`
```

</details>

<details><summary>Tous les produits de la marque #2 triés par note</summary>

```sql
SELECT * 
FROM `product` 
WHERE `brand_id` = 2
ORDER BY `rate`
```

</details>

<details><summary>Tous les produits de la marque #2 triés par prix</summary>

```sql
SELECT * 
FROM `product` 
WHERE `brand_id` = 2
ORDER BY `price`
```

</details>

## Type

<details><summary>Tous les produits du type #1 triés par nom</summary>

```sql
SELECT *
FROM `product`
WHERE `type_id` = 1
ORDER BY `name`
```

</details>

<details><summary>Tous les produits du type #1 triés par note</summary>

```sql
SELECT *
FROM `product`
WHERE `type_id` = 1
ORDER BY `rate`
```

</details>

<details><summary>Tous les produits du type #1 triés par prix</summary>

```sql
SELECT *
FROM `product`
WHERE `type_id` = 1
ORDER BY `price`
```

</details>

## Produit

<details><summary>Un produit (ex #1) + son nom de marque + son nom de catégorie</summary>

```sql
SELECT product.*, category.name AS category_name, brand.name AS brand_name
FROM product
LEFT JOIN category ON product.category_id = category.id
LEFT JOIN brand ON product.brand_id = brand.id
WHERE product.id = 1
```

</details>

