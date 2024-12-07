import axios from "axios";

const backEndInstance = axios.create({
  baseURL: process.env.NEXT_PUBLIC_API_BACKEND_BASE_URL,
  timeout: 80000,
});

export default backEndInstance;
