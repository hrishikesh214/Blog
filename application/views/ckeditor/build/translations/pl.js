(function(d){	const l = d['pl'] = d['pl'] || {};	l.dictionary=Object.assign(		l.dictionary||{},		{"%0 of %1":"%0 z %1","Align center":"Wyrównaj do środka","Align left":"Wyrównaj do lewej","Align right":"Wyrównaj do prawej",Big:"Duży","Block quote":"Cytat blokowy","Blue marker":"Niebieski marker",Bold:"Pogrubienie","Bulleted List":"Lista wypunktowana",Cancel:"Anuluj","Cannot upload file:":"Nie można przesłać pliku:","Centered image":"Obraz wyrównany do środka","Change image text alternative":"Zmień tekst zastępczy obrazka","Choose heading":"Wybierz nagłówek",Column:"Kolumna","Could not insert image at the current position.":"Nie można wstawić obrazka w bieżącej lokalizacji.","Could not obtain resized image URL.":"Nie można pobrać adresu URL obrazka po przeskalowaniu.","Decrease indent":"Zmniejsz wcięcie",Default:"Domyślny","Delete column":"Usuń kolumnę","Delete row":"Usuń wiersz",Downloadable:"Do pobrania","Dropdown toolbar":"Rozwijany pasek narzędzi","Edit link":"Edytuj odnośnik","Editor toolbar":"Pasek narzędzi edytora","Enter image caption":"Wstaw tytuł obrazka","Font Family":"Czcionka","Font Size":"Rozmiar czcionki","Full size image":"Obraz w pełnym rozmiarze","Green marker":"Zielony marker","Green pen":"Zielony długopis","Header column":"Kolumna nagłówka","Header row":"Wiersz nagłówka",Heading:"Nagłówek","Heading 1":"Nagłówek 1","Heading 2":"Nagłówek 2","Heading 3":"Nagłówek 3","Heading 4":"Nagłówek 4","Heading 5":"Nagłówek 5","Heading 6":"Nagłówek 6",Highlight:"Podświetlenie",Huge:"Bardzo duży","Image toolbar":"Pasek narzędzi obrazka","image widget":"Obraz","Increase indent":"Zwiększ wcięcie","Insert column left":"Wstaw kolumnę z lewej","Insert column right":"Wstaw kolumnę z prawej","Insert image":"Wstaw obraz","Insert image or file":"Wstaw obrazek lub plik","Insert media":"Wstaw media","Insert row above":"Wstaw wiersz ponad","Insert row below":"Wstaw wiersz poniżej","Insert table":"Wstaw tabelę","Inserting image failed":"Wstawienie obrazka nie powiodło się.",Italic:"Kursywa",Justify:"Wyrównaj obustronnie","Left aligned image":"Obraz wyrównany do lewej",Link:"Wstaw odnośnik","Link URL":"Adres URL","Media URL":"Adres URL","media widget":"widget osadzenia mediów","Merge cell down":"Scal komórkę w dół","Merge cell left":"Scal komórkę w lewo","Merge cell right":"Scal komórkę w prawo","Merge cell up":"Scal komórkę w górę","Merge cells":"Scal komórki",Next:"Następny","Numbered List":"Lista numerowana","Open in a new tab":"Otwórz w nowej zakładce","Open link in new tab":"Otwórz odnośnik w nowym oknie",Paragraph:"Akapit","Paste the media URL in the input.":"Wklej adres URL mediów do pola.","Pink marker":"Różowy marker",Previous:"Poprzedni","Red pen":"Czerwony długopis",Redo:"Ponów","Remove highlight":"Usuń podświetlenie","Rich Text Editor, %0":"Edytor tekstu sformatowanego, %0","Right aligned image":"Obraz wyrównany do prawej",Row:"Wiersz",Save:"Zapisz","Select column":"","Select row":"","Selecting resized image failed":"Wybranie obrazka po przeskalowaniu nie powiodło się.","Show more items":"Pokaż więcej","Side image":"Obraz dosunięty do brzegu, oblewany tekstem",Small:"Mały","Split cell horizontally":"Podziel komórkę poziomo","Split cell vertically":"Podziel komórkę pionowo",Strikethrough:"Przekreślenie","Table toolbar":"Pasek narzędzi tabel","Text alignment":"Wyrównanie tekstu","Text alignment toolbar":"Pasek narzędzi wyrównania tekstu","Text alternative":"Tekst zastępczy obrazka","Text highlight toolbar":"Pasek narzędzi podświetleń","The URL must not be empty.":"Adres URL nie może być pusty.","This link has no URL":"Nie podano adresu URL odnośnika","This media URL is not supported.":"Ten rodzaj adresu URL nie jest obsługiwany.",Tiny:"Bardzo mały","Tip: Paste the URL into the content to embed faster.":"Wskazówka: Wklej URL do treści edytora, by łatwiej osadzić media.","To-do List":"Lista rzeczy do zrobienia",Underline:"Podkreślenie",Undo:"Cofnij",Unlink:"Usuń odnośnik","Upload failed":"Przesyłanie obrazu nie powiodło się","Upload in progress":"Trwa przesyłanie","Widget toolbar":"Pasek widgetów","Yellow marker":"Żółty marker"}	);l.getPluralForm=function(n){return (n==1 ? 0 : (n%10>=2 && n%10<=4) && (n%100<12 || n%100>14) ? 1 : n!=1 && (n%10>=0 && n%10<=1) || (n%10>=5 && n%10<=9) || (n%100>=12 && n%100<=14) ? 2 : 3);;};})(window.CKEDITOR_TRANSLATIONS||(window.CKEDITOR_TRANSLATIONS={}));