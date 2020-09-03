function removeAccents(name) { 
    name = name.replace("Á", "A");
    name = name.replace("É", "E");
    name = name.replace("Í", "I");
    name = name.replace("Ó", "O");
    name = name.replace("Ú", "U");
    name = name.replace("Ü", "U");
    name = name.replace("á", "A");
    name = name.replace("é", "E");
    name = name.replace("í", "I");
    name = name.replace("ó", "O");
    name = name.replace("ú", "U");
    name = name.replace("ä", "A");
    name = name.replace("Ä", "A");
    name = name.replace("ë", "E");
    name = name.replace("Ë", "E");
    name = name.replace("ï", "I");
    name = name.replace("Ï", "I");
    name = name.replace("ö", "O");
    name = name.replace("Ö", "O");
    name = name.replace("ü", "U");
    name = name.replace("Ü", "U");
    name = name.replace("Ç", "C");
    name = name.replace("à", "A");
    name = name.replace("À", "A");
    name = name.replace("è", "E");
    name = name.replace("È", "E");
    name = name.replace("ì", "I");
    name = name.replace("Ì", "I");
    name = name.replace("ò", "O");
    name = name.replace("Ò", "O");
    name = name.replace("ù", "U");
    name = name.replace("Ù", "U");
    name = name.replace("â", "A");
    name = name.replace("Â", "A");
    name = name.replace("ê", "E");
    name = name.replace("Ê", "E");
    name = name.replace("î", "I");
    name = name.replace("Î", "I");
    name = name.replace("ô", "O");
    name = name.replace("Ô", "O");
    name = name.replace("û", "U");
    name = name.replace("Û", "U");
    name = name.replace("ñ", "NZ");
    return name;
}

function generateCutterCode(inputText, table) {   
    tblc = table.split("\n");
    cutter = ''; //  devuelve el valor de la tabla cutter que corresponde al input
    inputText = removeAccents(inputText);
    inputText = inputText.replace(" ", "");
    inputText = inputText.trim();
    inputText = inputText.toLowerCase();

    for (j = 0; j < (tblc.length - 1)   ; j++) {
        if (inputText >= tblc[j].slice(4) && inputText < tblc[j + 1].slice(4)) {
            if (inputText[0] == 'a' || inputText[0] == 'e' || inputText[0] == 'i' || inputText[0] == 'o' || inputText[0] == 'u') {
                cutter = inputText.slice(0, 2).toUpperCase() + tblc[j].slice(0, 3);
            } 
            else if (inputText[0] == 's' && inputText[1] != 'c') {
                cutter = inputText.slice(0, 2).toUpperCase() + tblc[j].slice(0, 3);
            } 
            else if (inputText[0] == 's' && inputText[1] == 'c') {
                cutter = inputText.slice(0, 3).toUpperCase() + tblc[j].slice(0, 3);
            } 
            else {
                cutter = inputText[0].toUpperCase() + tblc[j].slice(0, 3);
            }
            
            cutter = cutter.replace("0", "");
            cutter = cutter.replace("0", "");
            break;
        }
    }
    return cutter;
}