# CMS2-Labb3
https://github.com/DavidKjellson/CMS2-Labb3

## Guide
Detta en är guide som går igenom fyra plugin till Wordpress och berättar hur de används. Innan tilläggen kan användas krävs ytterligare plugins installerade:
* Advanced Custom Fields PRO
* WooCommerce

### Väderdata
Detta tillägg visar hur vädret och temperaturen är i Göteborg, med en marginal på en timme. Du kan själv välja att visa vädret på butikssidan, varukorgssidan, kassasidan, eller för en specifik produkt. Detta aktiverar man genom att gå in på redigeringsläge på din sida och bockar för rutan där det står "Visa väder", och för produkter kan du bocka för den när du lägger till en nya produkt, eller redigerar den.

### Räkneplugin
Detta plugin är lite annorlunda. Den kontrollerar textsträngar och returnerar ett godkännande ifall strängen är sju tecken långt. Hur detta kontrolleras gås mer in på detalj i pluginet "Testplugin/addon".

### Kontaktformulär
Med detta tillägg kan man skicka in ett meddelande till admin. Det finns tre fält: namn, e-postadress, samt själva meddelandet. När en användare har skrivit vad de ville ha sagt, så sparas detta meddelande i posttypen "Meddelanden", som går att hitta i sidopanelen under wp-admin.

### Testplugin/addon
Detta tillägg kompletterar räknepluginet. Här testar vi tre olika strängar av olika längd, och resultatet visas i butikssidan. Men eftersom inte vem som helst ska gå in och se, så behöver man knappa in texten `?testrun=yes` efter butikssidans adressfält.