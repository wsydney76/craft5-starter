function st_openPopup(action, data = {}, element) {
    Craft.sendActionRequest('POST', action, {data})
        .then((response) => {
            console.log(response)
            hud = new Garnish.HUD(element, response.data, {
                orientations: ['top', 'bottom', 'right', 'left'],
                hudClass: 'hud guide-hud',
            });
        })
        .catch((error) => {
            console.log(error.response)
            Craft.cp.displayError(error.response.data.error)
        })
}

// Show action response in slideout
function st_openSlideout(action, data = {}) {
    Craft.sendActionRequest('POST', action, {data})
        .then((response) => {
            console.log(response)
            slideout = new Craft.Slideout(response.data, {
                containerAttributes: {class: 'st-slideout-container'}
            })
        })
        .catch((error) => {
            console.log(error.response)
            Craft.cp.displayError(error.response.data.error)
        })
}