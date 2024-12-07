"use client";
import { server } from "@/utils/functions_tools/runningOnServer";
// Setando um cookie

// Opções:
// - `path=/`: Disponível em todo o site.
// - `max-age=604800`: Expira em 7 dias (em segundos).
// - `secure`: Disponível apenas em conexões HTTPS.
// - `samesite=strict`: O cookie é enviado apenas em requisições do mesmo site.

export enum SameSiteEnum {
    Strict = "strict",
    Lax = "lax",
    None = "none",
}

export type CookieOptionsType = {
    path: string;
    "max-age": number;
    samesite: SameSiteEnum;
    secure: boolean;
}

const defaultOptions: CookieOptionsType = {
    path: "/",
    "max-age": 604800,
    samesite: SameSiteEnum.Strict,
    secure: true,
}

export const createCookie = (name: string, value: string, options: CookieOptionsType = defaultOptions) => {
    if (server()) {
        return null
    }
    document.cookie = `${encodeURIComponent(name)}=${encodeURIComponent(value)}; path=${options.path}; max-age=${options["max-age"]}; ${options.secure ? "secure;" : ""} samesite=${options.samesite}`;
}

export const getCookie = (name: string): string | null => {
    if (server()) {
        return null
    }

    const cookies = document.cookie.split("; ");

    for (const cookie of cookies) {
        const [key, value] = cookie.split("=");
        if (key === name) {
            return decodeURIComponent(value);
        }
    }

    return null;
};

export const deleteCookie = (name: string, path: string = "/") => {
    if (server()) {
        return null
    }
    document.cookie = `${name}=; path=${path}; max-age=0; expires=Thu, 01 Jan 1970 00:00:00 GMT`;
};