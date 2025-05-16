export class Fraction {
  #numer;
  #denom;

  constructor(numerator, denominator) {
    if (denominator === 0) throw new Error("Знаменатель не может быть нулевым");

    const gcd = (a, b) => (b === 0 ? Math.abs(a) : gcd(b, a % b));
    const sign = denominator < 0 ? -1 : 1;
    const d = gcd(numerator, denominator);

    this.#numer = sign * numerator / d;
    this.#denom = Math.abs(denominator) / d;
  }

  get numer() {
    return this.#numer;
  }

  get denom() {
    return this.#denom;
  }

  add(frac) {
    const a = this.numer, b = this.denom;
    const c = frac.numer, d = frac.denom;
    return new Fraction(a * d + c * b, b * d);
  }

  sub(frac) {
    const a = this.numer, b = this.denom;
    const c = frac.numer, d = frac.denom;
    return new Fraction(a * d - c * b, b * d);
  }

  toString() {
    const n = this.numer;
    const d = this.denom;
    const whole = Math.trunc(n / d);
    const remainder = Math.abs(n % d);

    if (remainder === 0) return `${whole}`;

    if (Math.abs(n) < d) {
      return `${n}/${d}`;
    }

    return `${whole}'${remainder}/${d}`;
  }
}
