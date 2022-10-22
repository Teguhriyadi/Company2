import axios from "axios"

export function setHeaderToken(token) {
    axios.defaults.headers.common["Authorization"] = "Bearer " + token
}

export function removeHeaderToken(token) {
    delete axios.defaults.headers.common["Authorization"]
}
