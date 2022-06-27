function getCookie(name) {
    /**
     *  Summary:  Grabs what is stored in the cookie.
     *  @param {string} name Cookie Name.
     *  @return {string} returns cookie information if present.
     */
    
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}