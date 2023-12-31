# Algorithme de Rendu de Monnaie

### Description :

Cet algorithme en PHP, appelé rendreMonnaie, a pour objectif de rendre la monnaie avec des billets de 10, 5 et 2 unités. Il examine différentes conditions pour déterminer la meilleure façon de rendre la monnaie en minimisant le nombre de billets.

### Utilisation

Vous pouvez utiliser cet algorithme en appelant la fonction rendreMonnaie et en passant en paramètre le montant à rendre. Par exemple :

```
echo (rendu($nb));
```

### Fonctionnement

L'algorithme parcourt le tableau de billets (10, 5, 2) et teste différentes conditions pour déterminer le nombre optimal de billets à rendre. Il s'assure également de gérer les cas spécifiques, tels que les montants supérieurs à 15 ou les montants impairs.

### Exemples :

Pour `echo (rendu(31));`, 10+ 10 + 5 + 2 + 2



### **Auteur :**

Cet algorithme a été développé par Jérôme Delodder.
