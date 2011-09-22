=== plista ===
Tags: advertising, recommendations, plista, similar items, ads, related articles
Donate link: http://www.plista.com
Contributors: plista.com
Requires at least: 2.5.0
Tested up to: 3.1.2
Stable tag: 1.0

Enables the plista.com-service for your blog.

== Update hint ==

Dieses Plug-in wurde an sie exklusiv ausgeliefert und ist somit zur Zeit noch nicht im Wordpress Plugin directory hinterlegt. Eine automatische Update Funktion ist somit nicht verfügbar.

Sobald eine neue Version verfügbar ist bzw. die finale Version im Wordpress Plugin directory hinterlegt wurde, werden Sie umgehend per E-Mail benachrichtigt.

== Description ==

Ihre Vorteile auf einen Blick:

    * Erstes Werbeformat mit Besucher-Mehrwert
    * Traffic und gleichzeitig Umsätze erhšhen
    * Verweildauer Ihrer Besucher erhšhen
    * CTR zwischen 7%-11%
    * Kostenlose und einfache Registrierung
    * Keine Vertragslaufzeit

Das neue präferenzbasierte plista Werbeformat bietet Publishern eine innovative Lösung, um Ihre Internetseite und Produkte effizienter zu vermarkten. 
Mit unserem Werbeformat zeigen Sie Ihren Besuchern nutzerindividuellen Inhalt in einem relevanten Kontext. 
Die Schlüsseltechnologie von plista filtert webseitenübergreifend Inhalte von Internetseiten und ermittelt deren Relevanz. 
Die Besucher Ihrer Internetseite werden nur die Inhalte angezeigt, die seinen Präferenzen entsprechen und ermöglicht Publishern eine zielgenaue Ansprache.

== Premises ==

Um die dieses Plug-in nutzen zu können ist PHP5 notwendig.

== Installation == 

1. Speichern Sie die datei plista.zip (welche Sie am Ende der Registrierung heruntergeladen haben) auf Ihren Desktop. 
2. Loggen Sie sich mit Ihren Zugangsdaten in den Wordpress Administrationsbereich ein.
3. Wählen Sie das Menü "Plugin" aus.
4. Wählen Sie den Untermenü-Punkt "Installieren" aus.
5. Unter dem Feld "Installiere ein Plugin aus einem Zip-Archiv" auf "Durchsuchen" bzw. "Datei auswählen" klicken.
6. Wählen Sie die plista Zip-Datei aus (unentpackt), die Sie im ersten Schritt auf Ihren Desktop gespeichert haben
7. "Installieren" klicken und einen Moment warten, bis das Plugin auf den Server übertragen wird.
8. Aktivieren Sie das plugin
9. Unter Einstellungen finden Sie den Punkt plista, hier müssen Sie unbedingt noch den "Name des Widgets" und die "URL des Widgets" angeben. (Diese erhalten Sie unter https://www.plista.com/publishers/dashboard unter dem Punkt "Angelegte Domains" bei Klick auf "Code")
10. Falls Sie bei Autoinsert ein Häkchen gesetzt haben, müssen Sie noch folgendes an beliebiger Stelle in Ihrer single.php ergänzen <?php if (function_exists('plista_integration')) { echo plista_integration ($content); } ?>
11. Plista ist jetzt aktiv und kann genutzt werden

== Frequently Asked Questions ==
1. Warum wird bei mir keine Werbung angezeigt?
Werbung wird erst freigeschaltet sobald einige Artikel von Ihnen bei uns eingegangen sind, spätestens jedoch nach 24 Stunden.

2. Es wird die Meldung "plista wurde erfolgreich installiert" angezeigt?
Diese Meldung verschwindet automatisch nachdem ca. 10 Artikel von Ihnen bei uns eingetroffen sind.

Für weitere Fragen besuchen Sie bitte unser Wiki: wiki.plista.com

== Screenshots ==

Screenhosts werden in Kürze erhältlich sein	

== Changelog ==

1.0 @ 09-22-2011 6:00 pm
	* first official release
