import { Fraction } from '../src/Fraction.js';

describe('Fraction', () => {
  test('get numer и denom нормализуют дробь', () => {
    const frac = new Fraction(6, 9); // 2/3
    expect(frac.numer).toBe(2);
    expect(frac.denom).toBe(3);
  });

  test('add возвращает правильную сумму', () => {
    const a = new Fraction(1, 2);
    const b = new Fraction(1, 3);
    const result = a.add(b); // 5/6
    expect(result.numer).toBe(5);
    expect(result.denom).toBe(6);
    expect(result.toString()).toBe("5/6");
  });

  test('sub возвращает правильную разность', () => {
    const a = new Fraction(3, 4);
    const b = new Fraction(1, 2);
    const result = a.sub(b); // 1/4
    expect(result.numer).toBe(1);
    expect(result.denom).toBe(4);
    expect(result.toString()).toBe("1/4");
  });

  test('знаменатель равен 0 — выбрасывается ошибка', () => {
    expect(() => new Fraction(1, 0)).toThrow("Знаменатель не может быть нулевым");
  });

  test('нормализация отрицательных числителей и знаменателей', () => {
    let frac = new Fraction(-4, -6); // должно стать 2/3
    expect(frac.numer).toBe(2);
    expect(frac.denom).toBe(3);

    frac = new Fraction(4, -6); // должно стать -2/3
    expect(frac.numer).toBe(-2);
    expect(frac.denom).toBe(3);
  });

  test('сложение с отрицательными дробями', () => {
    const a = new Fraction(-1, 4);
    const b = new Fraction(1, 2);
    const result = a.add(b); // -1/4 + 1/2 = 1/4
    expect(result.numer).toBe(1);
    expect(result.denom).toBe(4);
    expect(result.toString()).toBe("1/4");
  });

  test('вычитание с отрицательными дробями', () => {
    const a = new Fraction(1, 4);
    const b = new Fraction(-1, 2);
    const result = a.sub(b); // 1/4 - (-1/2) = 3/4
    expect(result.numer).toBe(3);
    expect(result.denom).toBe(4);
    expect(result.toString()).toBe("3/4");
  });

  test('дробь с числителем 0', () => {
    const frac = new Fraction(0, 7);
    expect(frac.numer).toBe(0);
    expect(frac.denom).toBe(1); // после нормализации 0/1
    expect(frac.toString()).toBe("0");
  });

  test('создание дроби из целого числа', () => {
    const frac = new Fraction(6, 1);
    expect(frac.numer).toBe(6);
    expect(frac.denom).toBe(1);
    expect(frac.toString()).toBe("6");
  });

  test('toString для дробей, где числитель меньше знаменателя (правильная дробь)', () => {
    const frac = new Fraction(3, 5);
    expect(frac.toString()).toBe("3/5");
  });

  test('toString для отрицательных правильных дробей', () => {
    const frac = new Fraction(-3, 5);
    expect(frac.toString()).toBe("-3/5");
  });

  test('toString для дробей с нулём в числителе', () => {
    const frac = new Fraction(0, 10);
    expect(frac.toString()).toBe("0");
  });

  test('сложение дроби с самой собой', () => {
    const frac = new Fraction(3, 7);
    const result = frac.add(frac);
    expect(result.numer).toBe(6);
    expect(result.denom).toBe(7);
  });

  test('вычитание дроби самой из себя (результат 0)', () => {
    const frac = new Fraction(3, 7);
    const result = frac.sub(frac);
    expect(result.numer).toBe(0);
    expect(result.denom).toBe(1);
  });
});
