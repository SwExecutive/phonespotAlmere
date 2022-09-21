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

function deviceServices(){
    const services = [];
    services['inspection'] = "Inspectie + offerte";
    services['front_camera'] = "Frontcamera reparatie";
    services['back_camera'] = "Backcamera reparatie";
    services['power_button'] = "Batterij vervangen";
    services['battery'] = "Batterij vervangen";
    services['home_button'] = "Homeknop vervangen";
    services['vibration'] = "Trilknop vervangen";
    services['speaker'] = "Speaker vervangen";
    services['ear_speaker'] = "Ear speaker vervangen";
    services['headphone_jack'] = "Jack ingang vervangen";
    services['no_wifi'] = "Slecht of geen wifi bereik";
    services['no_connection'] = "Slecht of geen netwerk";
    services['frame'] = "Behuizing vervangen";
    services['volume_button'] = "Volumenknop reparatie";
    services['charge_port'] = "Oplaadconnector reparatie";
    services['microphone'] = "Microfoon reparatie";
    services['software'] = "Software probleem";
    services['backlight_chip'] = "Backlight chip reparatie";
    services['water_damage'] = "Waterschade reparatie";

    return services;
}