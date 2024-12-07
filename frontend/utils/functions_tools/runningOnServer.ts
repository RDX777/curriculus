export const server = (): boolean => {
    if (typeof window === "undefined") {
        return true;
    }
    return false
}
