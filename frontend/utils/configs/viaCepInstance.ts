import axios from "axios";

const ViaCepInstance = axios.create({
  baseURL: "https://viacep.com.br/ws",
  timeout: 80000,
  headers: {
    "Content-Type": "application/json",
    Accept: "application/json",
  },
});

export default ViaCepInstance;
