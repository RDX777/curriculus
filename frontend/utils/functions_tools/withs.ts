export function startsWith(prefix: string, message: string): boolean {
  const regex = new RegExp(`^${prefix}`);
  return regex.test(message);
}

export function contain(prefix: string, message: string): boolean {
  const regex = new RegExp(prefix);
  return regex.test(message);
}
