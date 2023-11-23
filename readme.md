# Algorithme de Rendu de Monnaie

### Description :

Cet algorithme en PHP, appelé rendreMonnaie, a pour objectif de rendre la monnaie avec des billets de 10, 5 et 2 unités. Il examine différentes conditions pour déterminer la meilleure façon de rendre la monnaie en minimisant le nombre de billets.

### Utilisation

Vous pouvez utiliser cet algorithme en appelant la fonction rendreMonnaie et en passant en paramètre le montant à rendre. Par exemple :

```
rendreMonnaie(10);
rendreMonnaie(11);
rendreMonnaie(21);
rendreMonnaie(23);
rendreMonnaie(31);
rendreMonnaie(16);
rendreMonnaie(15);
rendreMonnaie(13);
rendreMonnaie(189);
```

### Fonctionnement

L'algorithme parcourt le tableau de billets (10, 5, 2) et teste différentes conditions pour déterminer le nombre optimal de billets à rendre. Il s'assure également de gérer les cas spécifiques, tels que les montants supérieurs à 15 ou les montants impairs.

### Exemples :

Pour `rendreMonnaie(10)`, la sortie sera 1 x 10.
Pour `rendreMonnaie(11)`, la sortie sera 1 x 5 + 3 x 2
Pour `rendreMonnaie(21)`, la sortie sera 1 x 10 + 1 x 5 + 3 x 2
Pour `rendreMonnaie(23)`, la sortie sera 1 x 10 + 1 x 5 + 4 x 2
Pour `rendreMonnaie(31)`, la sortie sera 2 x 10 + 1 x 5 + 3 x 2
Pour `rendreMonnaie(16)`, la sortie sera 1 x 10 + 3 x 2.
Pour `rendreMonnaie(9007199254740991)`, la sortie sera 900719925474098 x 10 + 1 x 5 + 3 x 2

**Remarques :**
L'algorithme utilise la division entière (intdiv) pour obtenir le nombre entier de fois qu'un billet peut être utilisé.
La sortie est affichée sous forme de chaîne pour indiquer les billets rendus.

### **Auteur :**

Cet algorithme a été développé par Jérôme Delodder.
