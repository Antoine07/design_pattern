# STREET FIGHTERS 
Street Fighters est un jeu de combat développé par notre équipe.

## PROBLÉMATIQUE
Le jeu de combat **Street Fighters** n'est pas STATE friendly : si nous souhaitons ajouter de nouveaux états, on va devoir ajouter des "if" et le code va vite devenir ingérable => NOT sOlid (Open/Close notamment) !

```php
if State = 1 ...
else if State = 2 ...
else if State = 3 ...
else if State = 4 ...
else if State = 5 ...
else if State = 6 ...
else if State = 7 ...
/* 10 minutes later */
else if State = 157 ...
```
## COMMENT RENDRE NOTRE CODE GÉRABLE ?
Le patron de conception STATE nous permet de changer le comportement d'un objet lorsque son état interne change. 

### Au départ...
On a 3 classes qui gèrent les états :
- Si le fighter est en bonne forme (Healthy), il peut attaquer sans problème
- Si le fighter est KO, il ne peut plus attaquer
- Si le fighter est en colère, il perd des points

