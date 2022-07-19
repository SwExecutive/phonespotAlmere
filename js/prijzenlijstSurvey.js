function handlePrice(price){
    switch (price){
        case "0":
            return "Gratis";

        case "-1":
            return "Nvt";

        case "-2":
            return "Bellen";

        default:
            return "€ "+price+",-"
    }
}