export function trimLeft(itemToRemove: string, text: string) {
    const regex = new RegExp(`^${itemToRemove}`);
    return text.replace(regex, "");
}

export function trimRight(itemToRemove: string, text: string) {
    const regex = new RegExp(`${itemToRemove}`);
    return text.replace(regex, "");
}