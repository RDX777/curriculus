export function dateToIso<T extends Date | null | undefined>(
  dateToConvert: T
): string {
  const date = dateToConvert ? new Date(dateToConvert) : new Date();
  return date.toISOString().split("T")[0];
}
