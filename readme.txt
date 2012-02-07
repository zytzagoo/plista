=== plista ===
Tags: advertising, recommendations, plista, similar items, ads, related articles
Donate link: http://www.plista.com
Contributors: plista.com
Text Domain: plista
Requires at least: 2.5.0
Tested up to: 3.3.1
Stable tag: 1.3.5

The plista Widget adds plista RecommendationAds to your Wordpress blog posts.

== Description ==

= Vorteile =

- Erstes Werbeformat mit Besucher-Mehrwert
- Traffic und gleichzeitig Umsätze erhöhen
- Verweildauer Ihrer Besucher erhöhen
- Kostenlose und einfache Registrierung
- Keine Vertragslaufzeit

Das neue präferenzbasierte plista Werbeformat bietet Publishern eine innovative Lösung, um Ihre Internetseite und Produkte effizienter zu vermarkten. 
Mit unserem Werbeformat zeigen Sie Ihren Besuchern nutzerindividuellen Inhalt in einem relevanten Kontext. 
Die Schlüsseltechnologie von plista filtert webseitenübergreifend Inhalte von Internetseiten und ermittelt deren Relevanz. 
Die Besucher Ihrer Internetseite werden nur die Inhalte angezeigt, die seinen Präferenzen entsprechen und ermöglicht Publishern eine zielgenaue Ansprache.

= Übersetzungen =

* Spanish (es_ES) - Ramon Navarro

== Premises ==

Um die dieses Plug-in nutzen zu können ist PHP5 notwendig.

== Installation == 

1. Speichern Sie die das plista plugin auf Ihren Desktop.
2. Loggen Sie sich mit Ihren Zugangsdaten in ihren Wordpress Administrationsbereich ein.
3. Wählen Sie das Menü "Plugin" aus.
4. Wählen Sie den Untermenü-Punkt "Installieren" aus.
5. Unter dem Feld "Installiere ein Plugin aus einem Zip-Archiv" auf "Durchsuchen" bzw. "Datei auswählen" klicken.
6. Wählen Sie die plista.zip, die Sie im ersten Schritt auf Ihren Desktop gespeichert haben
7. "Installieren" klicken und einen Moment warten, bis das Plugin auf den Server übertragen wird.
8. Aktivieren Sie das Plugin.
9. Registrieren Sie sich unter www.plista.com/publisher_registrations um das Widget nutzen zu können.
10. Unter Einstellungen finden Sie den Punkt plista, hier müssen Sie unbedingt noch den "Name des Widgets" und die "URL des Widgets" angeben. (Diese erhalten Sie unter https://www.plista.com/publishers/dashboard unter dem Punkt "Angelegte Domains" bei Klick auf "Code")
11. Falls Sie bei Autoinsert ein Häkchen gesetzt haben, müssen Sie noch folgendes an beliebiger Stelle in Ihrer z.B. single.php ergänzen `<?php if (class_exists('plista')) { echo plista::plista_integration ($content); } ?>`
12. Plista ist jetzt aktiv und kann genutzt werden

== Frequently Asked Questions ==
= Woher bekomme ich den "Namen des Widgets" und die "URL des Widgets" welche ich unter Einstellungen angeben muss? =
Diese bekommen Sie am Ende der Registrierung auf www.plista.com/publisher_registrations

= Warum wird bei mir keine Werbung angezeigt? =
Werbung wird erst freigeschaltet sobald einige Artikel von Ihnen bei uns eingegangen sind, spätestens jedoch nach 24 Stunden.

= Es wird die Meldung "plista wurde erfolgreich installiert" angezeigt? =
Diese Meldung verschwindet automatisch nachdem ca. 10 Artikel von Ihnen bei uns eingetroffen sind.

Für weitere Fragen besuchen Sie bitte unser Wiki: wiki.plista.com

== Upgrade Notice ==

Please upgrade to Version 1.3.5

== Screenshots ==

1. plista Adminpage
2. Beispiel eines plista Widgets

== Changelog ==

1.0 @ 09-22-2011
	* first official release

1.1 @ 09-23-2011
	* major relase

1.2 @ 10-05-2011
	* better handling for img indexing
	* english translation v1

1.2.1 @ 10-31-2011
	* fixes picture related bugs

1.3.0 @ 12-07-2011
	* use wp_head to set custom css
	* improved styles for admin page
	* possibility to change widget style for mobile design (wptouch required)
	* possibility to set a default image

1.3.1 @ 12-08-2011
	* plista_integration function is no global available

1.3.2 @ 01-04-2012
	* fix css bugs
    * added new possibilities to style the widget
	* added possibility to exclude categories for pictureAds
	* tested functionality width wordpress 3.3.1

1.3.3 @ 01-27-2012
	* change order of image indexing
	* added spanish translations
	* jslint javascript used for admin page
	* added notice to contact plista before activating pictureAds
	* added possibility to exclude tags

1.3.4 @ 01-30-2012
	* fix warning if no tags are available

1.3.5 @ 02-07-2012
	* dont't look for youtube image if no youtube video is present

